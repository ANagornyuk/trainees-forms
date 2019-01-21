<header>
    <span>Hello, <span style="color: fuchsia"><?php $this->fetch['FirstName'] ?> </span>!</span>
    <span style="float: right">
            <form method="get" action="backend/logout.php">
                <input type="submit" value="Log out">
            </form>
    </span>
</header>
