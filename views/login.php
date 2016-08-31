<link rel="stylesheet" href="./styles/logIn.css"/>
<main id="wrapper">
    <form method="post">
        <div id="logIn">
            <fieldset>
                <legend>Log Into your account</legend>
                <input type="text" placeholder="Username" name="username"/>
                <input type="password" placeholder="Password" name="password"/>
                <input type="submit" value="Log me in" id="logInButton" name="login"/>
            </fieldset>
        </div>
    </form>
    <span class="or-reg">You don't have an account?</span>
    <form method="post" action="index.php">
        <div id="register">
            <fieldset>
                <legend>Create a new one</legend>
                <input type="text" placeholder="Username" name="username"/>
                <input type="text" placeholder="First name" name="firstName"/>
                <input type="text" placeholder="Last name" name="lastName"/>
                <input type="text" placeholder="Email address" name="email"/>
                <input type="text" placeholder="Email address" name="repeatEmail"/>
                <input type="password" placeholder="Password" name="password"/>
                <input type="password" placeholder="Repeat password" name="repeatPassword"/>
                <input type="submit" value="Register" id="registerButton" name="registerUser"/>
            </fieldset>
        </div>
    </form>
</main>