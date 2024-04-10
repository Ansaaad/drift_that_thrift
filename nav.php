    <header>Shop sustainably with Drift That Thrift-free shipping on all orders over 5000!</header>
	<nav class="navbar navbar-expand-md">
		<div class="container-fluid">
			<img src="./assests/logo.png" alt="logo">

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
				aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="./index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="aboutus.php">About us</a>
					</li>
					<?php
					$sql = "SELECT id,name, image FROM categories_products";
					$result = $conn->query($sql);
					?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
							Products
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">  
							<?php
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
								$category_name=$row["name"] ;
								$category_id=$row["id"];
								?>
							<li><a class="dropdown-item" href="categories.php?category=<?php echo $category_id ?>"><?php echo $category_name ?></a></li>
							<?php
										}
								}
							?>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="allproducts.php">All products</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		
		<form id="searchForm" class="d-flex" role="search" method="GET" action="search.php">
			<input id="searchInput" name="query" class="form-control me-2" type="search" placeholder="Enter product name" aria-label="Search" required style="width:300px;">
			<button class="btn btn-outline-success" type="submit">Search</button>
		</form>
		<ul class="navbar-nav ms-auto">
			<?php
			if(isset($_SESSION["cid"])){
				?>
			<li class="nav-item">
				<a class="nav-link" href="account.php">My Profile</a>
			</li>
			<?php
			}
			?>
            <?php
			if(isset($_SESSION["cid"])){
				?>
			<li class="nav-item">
				<a class="nav-link" href="terms_and_conditions.php">Sell Item</a>
			</li>
            <?php
            }
            ?>
			<li class="nav-item">
			<?php
								if(isset($_SESSION["cid"])){							
								?>
								<a class="nav-link" href="./logout.php">Logout</a>
								<?php
								}
								else{
									?>
				<a class="nav-link" href="./login.php">Signup/Login</a>
			</li>
			<?php
			}
			?>
			<?php
			if(isset($_SESSION["cid"])){
			?>
			<li class="nav-item">
				<a class="nav-link" href="./cart.php">Cart</a>
			</li>
			<?php
			}
			?>
		</ul>
		</div>
	</nav>
    <script>
    document.getElementById('searchForm').addEventListener('submit', function (event) {
        const searchInput = document.getElementById('searchInput');
        if (searchInput.value.trim() === '') {
            event.preventDefault(); // Prevent form submission
            alert('Please enter a search query.'); // Optionally display an alert or message to the user
        }
    });
</script>
