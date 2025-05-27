<header class="navbar">
    <style>
        .navbar {
            background-color: #2c3e50;
            color: white;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar-left {
            display: flex;
            align-items: center;
        }
        #btn-toggle-sidebar {
            font-size: 26px;
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            margin-right: 20px;
            user-select: none;
            transition: color 0.3s ease;
        }
        #btn-toggle-sidebar:hover,
        #btn-toggle-sidebar:focus {
            color: #1abc9c;
            outline: none;
        }
        .brand {
            font-weight: 700;
            font-size: 1.3rem;
            text-decoration: none;
            color: white;
        }
        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .user-menu {
            position: relative;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            user-select: none;
            font-weight: 600;
        }
        .user-menu:hover .dropdown-content,
        .user-menu:focus-within .dropdown-content {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .user-name {
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .dropdown-btn {
            background: none;
            border: none;
            color: white;
            font-size: 14px;
            cursor: pointer;
            user-select: none;
            transition: transform 0.3s ease;
        }
        .user-menu:hover .dropdown-btn,
        .user-menu:focus-within .dropdown-btn {
            transform: rotate(180deg);
        }
        .dropdown {
            position: relative;
            outline: none;
        }
        .dropdown-content {
            position: absolute;
            right: 0;
            background-color: #34495e;
            min-width: 160px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            padding: 8px 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: opacity 0.25s ease, transform 0.25s ease, visibility 0.25s;
            z-index: 1001;
        }
        .dropdown-content a {
            display: block;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            font-size: 15px;
            transition: background-color 0.2s ease;
            font-weight: 500;
            font-family: inherit;
        }
        .dropdown-content a:hover,
        .dropdown-content a:focus {
            background-color: #1abc9c;
            outline: none;
        }

        /* Logout button di sebelah user menu */
        form.logout-form {
            margin: 0;
        }
        form.logout-form button.logout-btn {
            background-color: transparent;
            border: 2px solid #1abc9c;
            color: #1abc9c;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease, color 0.3s ease;
            user-select: none;
            font-family: inherit;
        }
        form.logout-form button.logout-btn:hover,
        form.logout-form button.logout-btn:focus {
            background-color: #1abc9c;
            color: #2c3e50;
            outline: none;
        }

        /* User icon - optional */
        .user-icon {
            font-size: 24px;
            color: #1abc9c;
            user-select: none;
        }
    </style>

    <div class="navbar-left">
        <button id="btn-toggle-sidebar" aria-label="Toggle sidebar">&#9776;</button>
        <a href="{{ route('dashboard') }}" class="brand">GudangKantin</a>
    </div>

    <div class="navbar-right">
        <div class="user-menu dropdown" tabindex="0" aria-haspopup="true" aria-expanded="false" aria-label="User menu">
            <span class="user-icon">&#128100;</span>
            <span class="user-name">{{ auth()->user()->name ?? 'User' }}</span>
            <button class="dropdown-btn" aria-label="Toggle user menu">&#x25BC;</button>
            <div class="dropdown-content" role="menu" aria-label="User menu options">
                <a href="{{ route('profile') }}" role="menuitem" tabindex="-1">Profile</a>
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="logout-form" role="none">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</header>

<!-- Tambahkan margin-top agar konten tidak tertutup navbar -->
<style>
    body {
        margin-top: 60px;
    }
</style>
