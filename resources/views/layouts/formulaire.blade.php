<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer Un Compte</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg,rgb(17, 29, 203), #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 140vh;
            color: #333;
        }

        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }

        .login-container h2 {
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            color: #2575fc;
        }

        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            border-color: #2575fc;
            outline: none;
        }

        .sub{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .login-button {
            width: 100%;
            padding: 0.75rem;
            background: #2575fc;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
            justify-self: start;
        }

        .login-button:hover {
            background: #1b5bbf;
        }

        .login-butt {
            width: 100%;
            padding: 0.75rem;
            background:rgb(252, 37, 66);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
            justify-self: end;
        }

        .login-butt:hover {
            background:rgb(191, 27, 54);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 1.5rem;
            }

            .login-container h2 {
                font-size: 1.5rem;
            }

            .form-group input {
                padding: 0.5rem;
            }

            .login-button {
                padding: 0.5rem;
            }

            .login-butt {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Créer Votre Compte</h2>
        <form>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="nom" id="nom" placeholder="Entrez votre nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="prenom" id="prenom" placeholder="Entrez votre prenom">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Entrez votre email" required>
            </div>
            <div class="form-group">
                <label for="coordonnee">Coordonnée</label>
                <input type="coordonnee" id="coordonne" placeholder="Entrez vos coordonné">
            </div>
            <div class="form-group">
                <label for="numtel">Numéro de Téléphone</label>
                <input type="numtel" id="numtel" placeholder="Entrez votre contact">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" placeholder="Entrez votre mot de passe" required>
            </div>
            <div class="form-group">
                <label for="ville">Ville de Résidence</label>
                <input type="ville" id="ville" placeholder="Entrez votre ville de résidence">
            </div>
            <div class="form-group">
                <label for="specialite">Spécialité</label>
                <input type="specialite" id="specialite" placeholder="Entrez votre spécialité" required>
            </div>
            <div class="sub">
                <button type="submit" class="login-button">Valider</button>
                <button type="submit" class="login-butt">Annuler</button>
            </div>
        </form>
    </div>
</body>
</html>