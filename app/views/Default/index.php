<html>

<head>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
    <script src="/js/bootstrap.js"></script>
    <title>Index View</title>
</head>

<body>
    <a href="/default/create">Create a human</a>

    <table>
        <tr>
            <th>person_id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>Actions</th>
        </tr>
        <?php
			foreach($model as $person){
				echo "<tr>
						<td>$person->person_id</td>
						<td>$person->first_name</td>
						<td>$person->last_name</td>
						<td><a href='/default/delete/$person->person_id'>DELETE!!!</a>|<a href='/default/edit/$person->person_id'>Edit!</a></td>
					</tr>";
			}
		?>
    </table>
</body>

</html>