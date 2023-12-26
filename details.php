
<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: details.php");
   }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Details</title>
</head>
<body>

<h2>Data Details</h2>

<label for="dataDetails">Data Details:</label>
<textarea id="dataDetails" rows="4" required></textarea>
<button onclick="saveDetails()" class="button">Save</button>
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
textarea {
    flex: 1 1 0%;
background-color: var(--darker);
padding: 1rem;
border-radius: 1rem;
margin-right: 1rem;
color: var(--light);
font-size: 1.25rem;
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
<script>
    function saveDetails() {
        const dataDetails = document.getElementById('dataDetails').value;

        if (dataDetails) {
            // Assuming you have stored dataName and dataType in sessionStorage in index.html
            const dataName = sessionStorage.getItem('tempDataName');
            const dataType = sessionStorage.getItem('tempDataType');

            // You can customize this part based on your requirements
            const dashboardData = JSON.parse(sessionStorage.getItem('dashboardData')) || [];
            const newData = {
                name: dataName,
                type: dataType,
                details: dataDetails
            };
            dashboardData.push(newData);
            sessionStorage.setItem('dashboardData', JSON.stringify(dashboardData));

            alert('Data details saved successfully!');

            // Redirect to index.html
            window.location.href = 'home.php';
        } else {
            alert('Please fill in the data details.');
        }
    }
</script>

</body>
</html>
