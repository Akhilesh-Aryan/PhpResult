  <!-------Navigation Bar works ---->
       
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
            <a href="index.php" class="navbar-brand ml-5">myResult.com</a>
            <form  class="form-inline mx-auto"action="index.php" method="get">
               
                <input type = "search" class="form-control mx-auto" name="search" size="70" placeholder="search by name and roll">
                <input type="submit" class="btn btn-success ml-1" name="find" value="Search">
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item text-white"><a href="create_account.php" class="btn btn-info btn-sm">Create Account</a> ||</li>
                <li class="nav-item  text-white"><a href="insert.php" class="btn btn-dark btn-sm ml-1">Insert Record</a> ||</li>
                <li class="nav-item "><a href="logout.php" class="btn btn-light btn-sm ml-1">Logout</a></li>
            </ul>
        </nav>