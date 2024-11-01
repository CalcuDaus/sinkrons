<?php
class Cheat extends Databases
{
	function pages($query, $p, $batas = 5)
	{
		$p_count = $this->count($query);
		$p_batas = $batas;
		$p_halaman = ceil($p_count / $p_batas);
		$p_current = isset($_GET['set']) && !empty($_GET['set']) ? $_GET['set'] : 1;
		$p_current = ($p_current > $p_halaman) ? 1 : $p_current;
		$p_offset = ($p_current * $p_batas) - $p_batas;
		$p_limit = "LIMIT $p_batas OFFSET $p_offset";
		$no = $p_offset + 1;

		$prev = $p_current > 1 ? $p_current - 1 : $p_halaman;
		$next = $p_current < $p_halaman ? $p_current + 1 : 1;

		$links = "
		<nav class=\"pagination pagination-sm\" role=\"navigation\" aria-label=\"pagination\">
		<li class=\"page-item\"><a href=\"?p=$p&set=$prev\" class=\"page-link\">Previous</a></li>
		<ul class=\"pagination pagination-sm\">";

		for ($i = 1; $i <= $p_halaman; $i++) {
			$current = $p_current == $i ? "is-current" : "";
			$links .= "<li class=\"page-item\"><a href=\"?p=$p&set=$i\" class=\"page-link $current\">$i</a></li>";
		}

		$links .= "
		  </ul>
		  <li class=\"page-item\"><a href=\"?p=$p&set=$next\" class=\"page-link\">Next page</a></li>
		</nav>";

		return $hasil = [
			'no' => ($p_offset + 1),
			'count' => $p_count,
			'data' => $this->fetchAll($query . " " . $p_limit),
			'links' => $links,
			'detail' => "Menampilkan " . count($this->fetchAll($query . " " . $p_limit)) . " dari total $p_count data"
		];
	}

	function log($id, $activity, $detail)
	{
		return $this->query("INSERT INTO log(log_user,log_activity,log_detail)
          VALUES('$id', '$activity', '$detail')");
	}

	function accept($x = 'n')
	{
		if ($x == 'y') return "<i class=\"fa-solid fa-circle-check text-success\"></i>";
		else return "<i class=\"fa-solid fa-circle-xmark text-danger\"></i>";
	}
}
