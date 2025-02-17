<form method="POST" action="{{ route('auth.register') }}">
    @csrf
    <label for="name">Nom de famille :</label>
    <input type="name" name="name" id="name" required>

    <label for="firstname">Prénom :</label>
    <input type="firstname" name="firstname" id="firstname" required>

      <label for="password">Mot de passe:</label>
      <input type="password" name="password" id="password" required>

    <label for="birthday">Date de naissance :</label>
    <input type="birthday" name="birthday" id="birthday" required>

    <label for="Picture">Photo de profil :</label>
    <input type="Picture" name="Picture" id="Picture" required>

    <label for="Number">Numéro de téléphone :</label>
    <input type="Number" name="Number" id="Number" required>

    <label for="Number">Numéro de téléphone :</label>
    <input type="Number" name="Number" id="Number" required>

    <label for="mailing_address">Adresse postale:</label>
    <input type="mailing_address" name="mailing_address" id="mailing_address" required>

    <button type="submit">S'inscrire</button>
</form>
