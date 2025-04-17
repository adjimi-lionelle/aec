<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer Un Compte</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, rgb(17, 29, 203), #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
            padding: 15px;
            color: #333;
        }

        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
            margin: 20px 0;
        }

        .login-container h2 {
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            color: #2575fc;
        }

        .form-group {
            margin-bottom: 1.2rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #555;
            font-size: 0.95rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            border-color: #2575fc;
            outline: none;
            box-shadow: 0 0 0 2px rgba(37, 117, 252, 0.2);
        }

        .form-group input::placeholder {
            color: #aaa;
            font-size: 0.9rem;
        }

        .sub {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-top: 1.5rem;
        }

        .login-button {
            width: 100%;
            padding: 0.75rem;
            background: #2575fc;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .login-button:hover {
            background: #1b5bbf;
            transform: translateY(-2px);
        }

        .login-butt {
            width: 100%;
            padding: 0.75rem;
            background: rgb(252, 37, 66);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .login-butt:hover {
            background: rgb(191, 27, 54);
            transform: translateY(-2px);
        }

        .login-link {
            margin-top: 1.5rem;
            font-size: 0.9rem;
            color: #555;
        }

        .login-link a {
            color: #2575fc;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            text-decoration: underline;
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
                padding: 0.65rem;
            }

            .login-button, .login-butt {
                padding: 0.65rem;
                font-size: 0.95rem;
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
                <input type="text" id="nom" placeholder="Entrez votre nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" placeholder="Entrez votre prénom" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Entrez votre email" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" id="adresse" placeholder="Entrez votre adresse">
            </div>
            <div class="form-group">
                <label for="numtel">Numéro de Téléphone</label>
                <input type="tel" id="numtel" placeholder="Entrez votre numéro" pattern="[0-9]{10}">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" placeholder="Créez un mot de passe" required minlength="8">
            </div>
            <div class="form-group">
                <label for="ville">Ville de Résidence</label>
                <input type="text" id="ville" placeholder="Entrez votre ville">
            </div>
            <div class="form-group">
                <label for="specialite">Spécialité</label>
                <input type="text" id="specialite" placeholder="Votre domaine de spécialité">
            </div>
            
            <div class="sub">
                <button type="submit" class="login-button">S'inscrire</button>
                <button type="reset" class="login-butt">Annuler</button>
            </div>
            
            <div class="login-link">
                <p>Déjà un compte ? <a href="/login">Se connecter</a></p>
            </div>
        </form>
    </div>
</body>
</html>