<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">

		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">GROUPSAVE</a>
		</div>
		
		<? if (isset($_SESSION['USER'])) {?>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#"><i class="fa fa-home fa-lg"></i> <span class='visible-xs-inline hidden-sm visible-md-inline visible-lg-inline'>Home</span></a></li>
				<li class='disabled'><a href="#"><i class="fa fa-envelope-o fa-lg"></i> <span class='visible-xs-inline hidden-sm visible-md-inline visible-lg-inline'>Message</span></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right ">
				<li>
					<form class="navbar-form navbar-left" role="search">
						<div class="input-group">
							<input class="form-control search" type="text" id='sq' placeholder="Search ...">
							<span class="input-group-addon"><a href='#'><i class="fa fa-search fa-fw"></i></a></span>
						</div>
					</form>						
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<i class="fa fa-user fa-lg"></i> <?= $_SESSION['USER']?> <span class="caret"></span></a>
<!--						<i class="fa fa-ellipsis-h fa-lg"></i></a>-->
						
						
						
					<ul class="dropdown-menu" role="menu">
						<li class='disabled'><a href="#">Profile</a></li>
						<li class='disabled'><a href="#">Account Setting</a></li>
						<li class="divider"></li>
						<li><a href="#" onclick='signout();'>Sign Out</a></li>
					</ul>
	            </li>
			</ul>
		</div>
		<?}?>
	</div>
</nav>