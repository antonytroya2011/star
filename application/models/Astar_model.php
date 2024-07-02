<?php
class Astar_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function a_star_search($start, $goal, $graph) {
        $open_list = array($start);
        $closed_list = array();
        $g_scores = array($start => 0);
        $f_scores = array($start => $this->heuristic_cost_estimate($start, $goal));

        while (!empty($open_list)) {
            $current = $this->get_lowest_f_score($open_list, $f_scores);

            if ($current === $goal) {
                return $this->reconstruct_path($closed_list, $current);
            }

            $open_list = array_diff($open_list, array($current));
            $closed_list[] = $current;

            foreach ($graph[$current] as $neighbor => $cost) {
                if (in_array($neighbor, $closed_list)) {
                    continue;
                }

                $tentative_g_score = $g_scores[$current] + $cost;

                if (!in_array($neighbor, $open_list) || $tentative_g_score < $g_scores[$neighbor]) {
                    $g_scores[$neighbor] = $tentative_g_score;
                    $f_scores[$neighbor] = $g_scores[$neighbor] + $this->heuristic_cost_estimate($neighbor, $goal);

                    if (!in_array($neighbor, $open_list)) {
                        $open_list[] = $neighbor;
                    }
                }
            }
        }

        return null;
    }

    private function get_lowest_f_score($open_list, $f_scores) {
        $min_score = INF;
        $min_node = null;

        foreach ($open_list as $node) {
            if (isset($f_scores[$node]) && $f_scores[$node] < $min_score) {
                $min_score = $f_scores[$node];
                $min_node = $node;
            }
        }

        return $min_node;
    }

    private function heuristic_cost_estimate($start, $goal) {
        $start = floatval($start);
        $goal = floatval($goal);

        return abs($start - $goal);
    }

    private function reconstruct_path($closed_list, $current) {
        $total_path = array($current);

        while (in_array($current, $closed_list)) {
            $current = array_pop($closed_list);
            array_unshift($total_path, $current);
        }

        return $total_path;
    }
}
?>
