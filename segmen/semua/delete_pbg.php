<?php
$id = isset($_POST['id']) ? $_POST['id'] : 0;
$notif = "Tidak ada data!";

if( !empty($id))
{
	if( $cmd->count("SELECT * FROM pbg WHERE pbg_id='$id'") == 1)
	{
		if($cmd->query("DELETE FROM pbg WHERE pbg_id='$id'"))
		{
			$notif = "Data telah dihapus!";
		}
	}
}
?>
<div class="notification">
	<span class="delete"></span>
	<?= $notif; ?>
</div>