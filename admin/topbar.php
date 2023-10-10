<nav class="navbar navbar-light fixed-top" style="background-color: #e3f2fd;">
  <div class="container-fluid mt-2 mb-2">
    <div class="col-lg-12">
      <div class="navbar">
        <h1>CMT ADMIN SITE</h1>
        <a href="ajax.php?action=logout"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
      </div>
    </div>
  </div>
</nav>



<style>
	.navbar{
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		margin-bottom: -20px;

	}
</style>

