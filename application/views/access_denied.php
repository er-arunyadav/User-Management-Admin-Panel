<!DOCTYPE html>
<html>
<head>
	<title>403 Forbidden</title>
	<!-- Bootstrap 3.3.6 -->
  	<link rel="stylesheet" href="<?= base_url() ?>public/bootstrap/css/bootstrap.min.css">
  	<style type="text/css">
  		@import url("https://fonts.googleapis.com/css?family=Raleway:400,400i,700");
		*{
		  font-family: Raleway, sans-serif;
		}

		html,
		body,
		.container {
		  width: 100%;
		  height: 100%;
		  padding: 0;
		  margin: 0;
		}

		.container {
		  background: #2f2f2f;
		  display: flex;
		  align-items: center;
		  justify-content: center;
		  flex-wrap: wrap;
		}

		.content {
		  margin: 20px;
		}

		.mask {
		  display: block;
		  /* animation: mask 1s infinite; */
		  mask-image: url(https://i.postimg.cc/kgBSj8Zz/Masquerade.png);
		  mask-repeat: no-repeat;
		  -webkit-mask-image: url(https://i.postimg.cc/kgBSj8Zz/Masquerade.png);
		  -webkit-mask-repeat: no-repeat;
		}

		.text-center {
		  text-align: center;
		}

		.color-white-shadow {
		  color: #fff;
		  text-shadow: 0 -1px #0f0f0f;
		}

  	</style>
</head>

<body>
<div class="container">
  <div class="content">
    <h2 class="color-white-shadow text-center">403 Forbidden<br><small>Access denied</small></h2>
    <img src="https://images.unsplash.com/photo-1506202687253-52e1b29d3527?ixlib=rb-0.3.5&s=b43d68ed98b673427669234757d85e56&auto=format&fit=crop&w=300&q=80" width="300" height="140" class="mask">
    <p class="color-white-shadow text-center">You are not allowed to access this operation<br>Because it's in private mode.</p>
    <p class="text-center"><a href="#" onclick="window.history.go(-1); return false;">Go Back</a></p>
  </div>
</div>

</body>
</html>
