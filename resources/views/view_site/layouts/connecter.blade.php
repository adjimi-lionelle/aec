<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se Connecter</title>
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
            height: 100vh;
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
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }
        
        .remember-forgot a {
            color: #2575fc;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .remember-forgot a:hover {
            text-decoration: underline;
            color: #1b5bbf;
        }
        
        .remember-forgot label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #555;
            cursor: pointer;
        }

        .sub {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 1.5rem;
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
        }

        .login-button:hover {
            background: #1b5bbf;
        }

        .login-butt {
            width: 100%;
            padding: 0.75rem;
            background: rgb(252, 37, 66);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-butt:hover {
            background: rgb(191, 27, 54);
        }
        
        .register-link {
            font-size: 0.9rem;
            color: #555;
        }
        
        .register-link a {
            color: #2575fc;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        
        .register-link a:hover {
            text-decoration: underline;
            color: #1b5bbf;
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

            .login-button, .login-butt {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Se Connecter</h2>
        @include('message')
        <form action="{{ route('view_site/layouts/connecter') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Entrez votre email">
                @error('email')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="mot_de_passe">Mot de passe</label>
                <input type="mot_de_passe" id="mot_de_passe" name="password" placeholder="Entrez votre mot de passe">
                @error('password')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox" name="remember"> Se souvenir de moi</label>
                <a href="#">Mot de passe oublié ?</a>
            </div>
            <div class="sub">
               <button type="submit" class="login-button">Se connecter</button>
               <button type="button" class="login-butt">Annuler</button>
            </div>
            <div class="register-link">
                <p>Vous n'avez pas de compte ? <a href="/form">Créer un compte</a></p>
            </div>
        </form>
    </div>
</body>
</html>