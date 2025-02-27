<?php
declare(strict_types=1);

namespace App\Models;

use Nette\Database\Explorer;
use App\Models\Todo;

class Api
{
	public Explorer $db;
	private Todo $todo;

	public function api()
	{
		header("Content-Type: application/json");

		$method = $_SERVER['REQUEST_METHOD'];
		$input = json_decode(file_get_contents('php://input'), true);

		switch ($method) {
			case 'GET':
				if (isset($_GET['id'])) {
					$id = $_GET['id'];
					$result = $conn->query("SELECT * FROM users WHERE id=$id");
					$data = $result->fetch_assoc();
					echo json_encode($data);
				} else {
					$result = $this->todo->getAllTodos();
					$users = [];
					while ($row = $result->fetch_assoc()) {
						$users[] = $row;
					}
					echo json_encode($users);
				}
				break;

			case 'POST':
				$name = $input['name'];
				$email = $input['email'];
				$age = $input['age'];
				$conn->query("INSERT INTO users (name, email, age) VALUES ('$name', '$email', $age)");
				echo json_encode(["message" => "User added successfully"]);
				break;

			case 'PUT':
				$id = $_GET['id'];
				$name = $input['name'];
				$email = $input['email'];
				$age = $input['age'];
				$conn->query("UPDATE users SET name='$name',
                     email='$email', age=$age WHERE id=$id");
				echo json_encode(["message" => "User updated successfully"]);
				break;

			case 'DELETE':
				$id = $_GET['id'];
				$conn->query("DELETE FROM users WHERE id=$id");
				echo json_encode(["message" => "User deleted successfully"]);
				break;

			default:
				echo json_encode(["message" => "Invalid request method"]);
				break;
		}

		$conn->close();

	}
}