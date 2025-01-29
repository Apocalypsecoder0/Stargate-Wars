<?
include_once("../config.php");
$s = new Game();

if (!$s->loggedIn)
{
?>
<form method="post" action="index.php" class="register-form">
    <div class="form-container">
        <div class="form-group">
            <label for="user" class="form-label">Username:</label>
            <input type="text" id="user" name="user" class="form-input" aria-label="Username" required />
        </div>
        <div class="form-group">
            <label for="hpname" class="form-label">Home Planet Name:</label>
            <input type="text" id="hpname" name="hpname" class="form-input" aria-label="Home Planet Name" required />
        </div>
        <div class="form-group">
            <label for="pass" class="form-label">Password:</label>
            <input type="password" id="pass" name="pass" class="form-input" aria-label="Password" required />
        </div>
        <div class="form-group">
            <label for="email" class="form-label">E-mail Address:</label>
            <input type="email" id="email" name="email" class="form-input" aria-label="E-mail Address" required />
        </div>
        <div class="form-group">
            <label for="rid" class="form-label">Race:</label>
            <select id="rid" name="rid" class="form-select" aria-label="Race">
                <?
                    $list = $s->getRaces();
                    for ($x = 0; $x < count($list); $x++)
                    {
                        echo "<option value='".$list[$x]["id"]."'>".$list[$x]["name"]."</option>\r\\n";
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="number" class="form-label">Captcha:</label>
            <input name="number" type="text" id="number" class="form-input" aria-label="Captcha" required />
            <img src="image.php?mt=<?= microtime();?>" alt="Captcha Image" />
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Register" class="form-button" />
        </div>
    </div>
</form>
<script>
    document.querySelector('.register-form').addEventListener('submit', function(event) {
        const username = document.getElementById('user').value;
        const hpname = document.getElementById('hpname').value;
        const password = document.getElementById('pass').value;
        const email = document.getElementById('email').value;
        const number = document.getElementById('number').value;
        if (!username || !hpname || !password || !email || !number) {
            event.preventDefault();
            alert('Please fill in all fields.');
        }
    });
</script>
<?
}
else
{
	echo "You are Logged in, You can register another account its against rules";
}

?>