<?php
class Cheat
{
	function pages()
	{
		echo "
		<nav class=\"d-flex align-items-center gap-3 mt-3 \" role=\"navigation\" aria-label=\"pagination\">
		  <a href=\"#\" class=\"p-2 bg-primary text-decoration-none text-white rounded\">Previous</a>
		  <ul class=\"d-flex list-unstyled gap-3 m-0\">
		  		<li><a href=\"#\" class=\"p-2 bg-primary text-white text-decoration-none rounded is-current\">1</a></li>
		  		<li><a href=\"#\" class=\"p-2 border border-primary border-2 text-primary text-decoration-none rounded\">2</a></li>
		  		<li><a href=\"#\" class=\"p-2 border border-primary border-2 text-primary text-decoration-none rounded\">3</a></li>
		  </ul>
		  <a href=\"#\" class=\"p-2 bg-primary text-white rounded text-decoration-none\">Next page</a>
		</nav>
		";
	}
}
