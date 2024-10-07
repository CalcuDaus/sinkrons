<?php
class Cheat
{
	function pages()
	{
		echo "
		<nav class=\"pagination is-small\" role=\"navigation\" aria-label=\"pagination\">
		  <a href=\"#\" class=\"pagination-previous\">Previous</a>
		  <a href=\"#\" class=\"pagination-next\">Next page</a>
		  <ul class=\"pagination-list\">
		    <li><a href=\"#\" class=\"pagination-link is-current\">1</a></li>
		    <li><a href=\"#\" class=\"pagination-link\">2</a></li>
		    <li><a href=\"#\" class=\"pagination-link\">3</a></li>
		  </ul>
		</nav>
		";
	}
}
?>