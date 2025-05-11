<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
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
            max-width: 500px;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }

        .login-container h2 {
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            color: #2575fc;
        }

        .form-group {
            margin-bottom: 0.1rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.2rem;
            font-weight: bold;
            color: #555;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus, .form-group select:focus {
            border-color: #2575fc;
            outline: none;
        }
        
        .button-group {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .submit-button {
            flex: 1;
            padding: 0.75rem;
            background: #2575fc;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .submit-button:hover {
            background: #1b5bbf;
        }

        .reset-button {
            flex: 1;
            padding: 0.75rem;
            background: rgb(252, 37, 66);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .reset-button:hover {
            background: rgb(191, 27, 54);
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
                margin: 1rem;
            }

            .login-container h2 {
                font-size: 1.5rem;
            }

            .form-group input, .form-group select {
                padding: 0.5rem;
            }

            .submit-button, .reset-button {
                padding: 0.5rem;
            }
            
            .button-group {
                flex-direction: column;
                gap: 0.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Modifier</h2>
        @include('message')
        @if(isset($getRecord) && $getRecord)
        <form action="{{ url('service/edit/' . $getRecord->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" value="{{ $getRecord->nom }}" required>
            </div>
            
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" value="{{ $getRecord->prenom }}" required>
            </div>

            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" id="ville" name="ville" value="{{ $getRecord->ville }}"  required>
            </div>

            <div class="form-group">
                <label for="specialite">Spécialité</label>
                <input type="tel" id="specialite" name="specialite" value="{{ $getRecord->specialite }}"  required>
            </div>

            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" id="contact" name="contact" value="{{ $getRecord->contact }}"  required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ $getRecord->email}}"  required>
            </div>
            
            <div class="form-group">
                <label for="mot_de_passe">Mot de Passe</label>
                <input type="mot_de_passe" id="mot_de_passe" name="mot_de_passe" value="{{ $getRecord->password}}"  required>
            </div>
            
            <div class="form-group">
                <label>Photo</label>
                <input type="file" accept=".png" required>
            </div>
            
            <div class="button-group">
                <button type="submit" class="submit-button">Soumettre</button>
                <button type="reset" class="reset-button">Annuler</button>
            </div>
        </form>
        @endif
    </div>
</body>
</html>
    