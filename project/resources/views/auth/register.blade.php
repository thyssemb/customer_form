<form method="POST" action="{{ route('auth.register') }}" enctype="multipart/form-data">
    @csrf
    <label for="name">Nom de famille :</label>
    <input type="name" name="name" id="name" required>

    <label for="firstname">Prénom :</label>
    <input type="text" name="firstname" id="firstname" required>

      <label for="password">Mot de passe:</label>
      <input type="text" name="password" id="password" required>

    <label for="birthday">Date de naissance :</label>
    <input type="date" name="birthday" id="birthday" required>

    <label for="Picture">Photo de profil :</label>
    <input type="file" name="Picture" id="Picture" required>

    <label for="Number">Numéro de téléphone :</label>
    <input type="tel" name="Number" id="Number" required>

    <label for="mailing_address">Adresse postale:</label>
    <input type="text" name="mailing_address" id="mailing_address" required>

    <button type="submit">S'inscrire</button>
</form>
