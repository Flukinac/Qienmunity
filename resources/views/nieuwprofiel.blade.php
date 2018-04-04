<html>
    <body>
        <h1>Nieuw profiel maken</h1><br>
        
        <a href="http://localhost:8000/">Home</a><br>
        <a href="http://localhost:8000/profiel">Profiel</a><br>
        <a href="http://localhost:8000/nieuws">Nieuws</a><br>
        <a href="http://localhost:8000/community">Community</a><br>
        <a href="http://localhost:8000/resources">Resources</a><br>
        <a href="http://localhost:8000/contact">Contact</a><br>
        
        <h2>Maak nieuw profiel aan</h2><!--Formulier om en nieuw profiel aan te kunnen maken-->
        <form action ="">

            Rol: <select name="werkstatus">
                <option>Trainee</option>
                <option>Admin</option>
                <option>Docent</option>
            </select><br/>
            Naam: <input type ="text" name="naam" placeholder="Naam"><br/>
            E-mailadres: <input type ="text" name="emailadres" placeholder="example@qien.nl"><br/>
            Tijdelijk wachtwoord: <input type ="text" name="tempww" placeholder="Nieuw wachtwoord"><br/>
            <input type="submit" value="Maak nieuw profiel aan >">

        </form>
    </body>
</html>