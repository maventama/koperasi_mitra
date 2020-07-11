<?php

function count_all($table, $where = [], $like = [], $or_where = [])
{
    $db      = \Config\Database::connect();
    $builder = $db->table($table);
    if ($where) {
        $builder->where($where);
        if ($or_where) {
            foreach ($or_where as $k => $v) {
                $builder->orWhere($k, $v);
            }
        }
    }
    if ($like) {
        $builder->like($like);
    }
    return $builder->countAllResults();
}
function table_head($column, $properti)
{
    $string = "<table $properti>";
    $string .= "<thead><tr>";
    foreach ($column as $ck => $cv) {
        $string .= "<th>" . $cv['title'] . "</th>";
    }
    $string .= "</thead></tr>";
    $string .= "</table>";
    return $string;
}
// function count_filtered1($table, $join = [], $column_search = [], $where = [], $like = [], $group_by = [], $or_like = [], $or_where = [], $order = '', $urut = 'desc')
// {
//     $db      = \Config\Database::connect();
//     $builder = $db->table($table);
//     $this->get_datatables_query1($table, $join, $column_search, $where, $like, $group_by, $or_like, $or_where, $order, $urut);
//     $query = $this->db->get();
//     return $query->num_rows();
// }
