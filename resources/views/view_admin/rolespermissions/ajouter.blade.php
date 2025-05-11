<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de Rôle | Administration</title>
    <meta name="description" content="Interface de création de rôles avec permissions">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>👨‍💼</text></svg>">
    
    <style>
        :root {
            --primary-blue: rgb(17, 29, 203);
            --secondary-blue: #2575fc;
            --danger-red: rgb(252, 37, 66);
            --danger-dark: rgb(191, 27, 54);
            --light-gray: #f8f9fa;
            --medium-gray: #e9ecef;
            --dark-gray: #212529;
            --border-radius-sm: 5px;
            --border-radius-md: 10px;
            --transition-fast: 0.2s ease;
            --shadow-md: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 1rem;
            line-height: 1.5;
            color: var(--dark-gray);
        }

        .login-container {
            background: white;
            padding: 2rem;
            border-radius: var(--border-radius-md);
            box-shadow: var(--shadow-md);
            width: 100%;
            max-width: 500px;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            color: var(--secondary-blue);
            font-weight: 600;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #555;
            font-size: 0.95rem;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--medium-gray);
            border-radius: var(--border-radius-sm);
            font-size: 1rem;
            transition: border-color var(--transition-fast), box-shadow var(--transition-fast);
            background-color: var(--light-gray);
        }

        input:focus,
        select:focus {
            border-color: var(--secondary-blue);
            outline: none;
            box-shadow: 0 0 0 3px rgba(37, 117, 252, 0.15);
            background-color: white;
        }

        .permissions-container {
            max-height: 300px;
            overflow-y: auto;
            padding: 0.5rem;
            margin: 1rem 0;
            border: 1px solid var(--medium-gray);
            border-radius: var(--border-radius-sm);
            background-color: var(--light-gray);
        }

        .permission-item {
            display: flex;
            align-items: center;
            padding: 0.5rem;
            margin-bottom: 0.5rem;
            background-color: white;
            border-radius: var(--border-radius-sm);
            transition: background-color var(--transition-fast);
        }

        .permission-item:last-child {
            margin-bottom: 0;
        }

        .permission-item:hover {
            background-color: var(--medium-gray);
        }

        .permission-item input {
            margin-right: 0.75rem;
            width: 1.1em;
            height: 1.1em;
            accent-color: var(--secondary-blue);
            cursor: pointer;
        }

        .permission-item label {
            margin-bottom: 0;
            cursor: pointer;
            flex-grow: 1;
        }

        .button-group {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .btn {
            flex: 1;
            padding: 0.75rem;
            border: none;
            border-radius: var(--border-radius-sm);
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: 
                background-color var(--transition-fast), 
                transform var(--transition-fast);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .btn-primary {
            background-color: var(--secondary-blue);
            color: white;
        }

        .btn-primary:hover {
            background-color: #1a68e6;
            transform: translateY(-2px);
        }

        .btn-danger {
            background-color: var(--danger-red);
            color: white;
        }

        .btn-danger:hover {
            background-color: var(--danger-dark);
            transform: translateY(-2px);
        }

        .permissions-container::-webkit-scrollbar {
            width: 6px;
        }

        .permissions-container::-webkit-scrollbar-track {
            background: var(--light-gray);
            border-radius: 10px;
        }

        .permissions-container::-webkit-scrollbar-thumb {
            background: #adb5bd;
            border-radius: 10px;
        }

        .permissions-container::-webkit-scrollbar-thumb:hover {
            background: #6c757d;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 1.5rem;
            }

            h2 {
                font-size: 1.5rem;
            }

            .button-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Créer un nouveau rôle</h2>
        
        <form action="{{ route('roles.store') }}" method="POST" novalidate>
            @csrf
            
            <div class="form-group">
                <label for="roleName">Nom du rôle</label>
                <input type="text" name="name" required placeholder="Ex: Entrepreneur">
                <small class="sr-only">Entrez un nom unique pour ce rôle</small>
            </div>
            
            <div class="form-group">
                <label>Permissions</label>
                <div class="permissions-container" role="group">
                    <div class="sr-only">Sélectionnez les permissions à attribuer</div>
                    
                    @foreach($permissions as $permission)
                    <div class="permission-item">
                        <input type="checkbox" 
                               id="perm-{{ $permission->id }}" 
                               name="permissions[]" 
                               value="{{ $permission->name }}"
                               aria-labelledby="perm-label-{{ $permission->id }}">
                        <label id="perm-label-{{ $permission->id }}" for="perm-{{ $permission->id }}">
                            {{ $permission->name }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <div class="button-group">
                <button type="submit" class="btn btn-primary">
                    Créer le rôle
                </button>
                <a href="/roles" class="btn btn-danger">
                    Retour
                </a>
            </div>
        </form>
    </div>
</body>
</html>