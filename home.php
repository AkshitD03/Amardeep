<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>
<body>
    
        <div class="right-links">

            <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
            }
            
            echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
            ?>

            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>

        </div>
    </div>


    <h1 style="text-align: center;">AMARDEEP.com</h1>
           

 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        #sidebar {
            display: flex;
            justify-content: space-between;
            padding: 1rem;
            border-radius: 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        #sidebar a:hover {
            color: #f1f1f1;
        }

        #content {
            flex: 1;
            padding: 20px;
        }

        #dashboard {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        button {
            padding: 8px;
            margin-top: 10px;
            cursor: pointer;
        }

        #modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
        }

        .close {
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
    <style>
        :root {
	--dark: #374151;
	--darker: #1F2937;
	--darkest: #111827;
	--grey: #6B7280;
	--pink: #EC4899;
	--purple: #8B5CF6;
	--light: #EEE;
}

* {
	margin: 0;
	box-sizing: border-box;
	font-family: "Fira sans", sans-serif;
}

body {
	display: flex;
	flex-direction: column;
	min-height: 100vh;
	color: #FFF;
	background-color: var(--dark);
}

header {
	padding: 2rem 1rem;
	max-width: 800px;
	width: 100%;
	margin: 0 auto;
    flex-direction: column;
}

header h1{ 
	font-size: 2.5rem;
	font-weight: 300;
	color: var(--grey);
	margin-bottom: 1rem;
}

#new-task-form {
	display: flex;;
}

input, button {
	appearance: none;
	border: none;
	outline: none;
	background: none;
}

#new-task-input {
	flex: 1 1 0%;
	background-color: var(--darker);
	padding: 1rem;
	border-radius: 1rem;
	margin-right: 1rem;
	color: var(--light);
	font-size: 1.25rem;
}

#new-task-input::placeholder {
	color: var(--grey);
}

#new-task-submit {
	color: var(--pink);
	font-size: 1.25rem;
	font-weight: 700;
	background-image: linear-gradient(to right, var(--pink), var(--purple));
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	cursor: pointer;
	transition: 0.4s;
}

#new-task-submit:hover {
	opacity: 0.8;
}

#new-task-submit:active {
	opacity: 0.6;
}

main {
	flex: 1 1 0%;
	max-width: 800px;
	width: 100%;
    flex-direction: column;
	margin: 0 auto;
}

.task-list {
	padding: 1rem;
}

.task-list h2 {
	font-size: 1.5rem;
	font-weight: 300;
	color: var(--grey);
	margin-bottom: 1rem;
}

#tasks .task {
	display: flex;
	justify-content: space-between;
	background-color: var(--darkest);
	padding: 1rem;
	border-radius: 1rem;
	margin-bottom: 1rem;
}

.task .content {
	flex: 1 1 0%;
}

.task .content .text {
	color: var(--light);
	font-size: 1.125rem;
	width: 100%;
	display: block;
	transition: 0.4s;
}

.task .content .text:not(:read-only) {
	color: var(--pink);
}

.task .actions {
	display: flex;
	margin: 0 -0.5rem;
}

.task .actions button {
	cursor: pointer;
	margin: 0 0.5rem;
	font-size: 1.125rem;
	font-weight: 700;
	text-transform: uppercase;
	transition: 0.4s;
}

.task .actions button:hover {
	opacity: 0.8;
}

.task .actions button:active {
	opacity: 0.6;
}

.task .actions .edit {
	background-image: linear-gradient(to right, var(--pink), var(--purple));
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
}

.task .actions .delete {
	color: crimson;
}
.button{
    color: var(--pink);
	font-size: 1.25rem;
	font-weight: 700;
	background-image: linear-gradient(to right, var(--pink), var(--purple));
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	cursor: pointer;
	transition: 0.4s;
}
.button{
    color: var(--pink);
	font-size: 1.25rem;
	font-weight: 700;
	background-image: linear-gradient(to right, var(--pink), var(--purple));
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	cursor: pointer;
	transition: 0.4s;
}
    </style>
</head>
<body>

<div id="sidebar">
    <a href="#" onclick="showTab('data')">Data List</a>
    <a href="#" onclick="showTab('otherTab1')">Todo List</a>
    <a href="#" onclick="showTab('otherTab2')">Financial Planner</a>
</div>
<p style="color: white;">Hello <b><?php echo $res_Uname ?></b>, Welcome</p>
<div id="content">
    <!-- <button onclick="toggleSidebar()">Toggle Sidebar</button> -->
    <div id="dashboard"></div>
    <button onclick="openModal()" class="button">Create Data</button>
</div>

<div id="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <label for="dataName" style="color: #111827; ">Data Name:</label>
        <input type="text" id="dataName" required style="border-color: #111827; ">
        <label for="dataType" style="color: #111827;">Data Type:</label>
        <input type="text" id="dataType" required>
        <button onclick="redirectToDetails()" class="button">Next</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    loadDashboard();
});

function showTab(tabName) {
    if (tabName === 'data') {
        document.getElementById('content').style.display = 'block';
        document.getElementById('dashboard').style.display = 'grid';
    } else if (tabName === 'otherTab1') {
        window.location.href = 'todo.php';
    } else if (tabName === 'otherTab2') {
        window.location.href = 'automation.php';
    } else {
        document.getElementById('content').style.display = 'none';
        document.getElementById('dashboard').style.display = 'none';
    }
}

function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.style.width = sidebar.style.width === '250px' ? '0' : '250px';
}

function openModal() {
    document.getElementById('modal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}

function redirectToDetails() {
    const dataName = document.getElementById('dataName').value;
    const dataType = document.getElementById('dataType').value;

    if (dataName && dataType) {
        sessionStorage.setItem('tempDataName', dataName);
        sessionStorage.setItem('tempDataType', dataType);

        const dashboardData = JSON.parse(sessionStorage.getItem('dashboardData')) || [];
        const newData = { name: dataName, type: dataType, details: '' };
        dashboardData.push(newData);
        sessionStorage.setItem('dashboardData', JSON.stringify(dashboardData));

        window.location.href = 'details.php';
    } else {
        alert('Please fill in all fields.');
    }
}

function loadDashboard() {
    const dashboard = document.getElementById('dashboard');
    dashboard.innerHTML = '';

    const dashboardData = JSON.parse(sessionStorage.getItem('dashboardData')) || [];

    dashboardData.forEach((data, index) => {
        if (!(data.name === sessionStorage.getItem('tempDataName') && data.type === sessionStorage.getItem('tempDataType'))) {
            const card = document.createElement('div');
            card.className = 'card';
            card.innerHTML = `
                <h3>${data.name}</h3>
                <p>Type: ${data.type}</p>
                <p>Details: ${data.details}</p>
                <button style="color: white; background-color: red; border-radius: 10px;" onclick="deleteData(${index})">Delete</button>
            `;
            dashboard.appendChild(card);
        }
    });
}

function deleteData(index) {
    let dashboardData = JSON.parse(sessionStorage.getItem('dashboardData')) || [];
    dashboardData.splice(index, 1);
    sessionStorage.setItem('dashboardData', JSON.stringify(dashboardData));
    loadDashboard();
}

</script>

</body>
</html>