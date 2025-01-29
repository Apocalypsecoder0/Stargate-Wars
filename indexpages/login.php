<form method="post" action="index.php" class="login-form">
    <div class="form-container" style="background-image:url(images/login.jpg);">
        <div class="form-group">
            <label for="user" class="form-label">Email:</label>
            <input type="text" id="user" name="user" class="form-input" aria-label="Email" required />
        </div>
        <div class="form-group">
            <label for="pass" class="form-label">Password:</label>
            <input type="password" id="pass" name="pass" class="form-input" aria-label="Password" required />
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Login" class="form-button" />
        </div>
    </div>
</form>
<script>
    document.querySelector('.login-form').addEventListener('submit', function(event) {
        const email = document.getElementById('user').value;
        const password = document.getElementById('pass').value;
        if (!email || !password) {
            event.preventDefault();
            alert('Please fill in both fields.');
        }
    });
</script>