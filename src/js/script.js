/* const url's, these are the urls we are working with
 *
 */

const urlToGetRecords = 'getrecords.php';
const urlToUpdateRecords = 'updaterecords.php';
const urlToSaveRecords = 'saverecords.php';
const urlToDeleteRecords = 'deleterecords.php';

const urlToTest = 'test.php';

/* function to get all the records
 *
 */
function getRecords() {
    console.log("get records has been called.");

    fetch(urlToGetRecords, {
        method: 'GET',  
    })
    .then(res => res.json())
    .then(response => success(response))
    .catch(error => failure(error));
}

function success(json) {
    let person = '';

    json.forEach(element => {
        person += '<div>';
        person += '<p>First name ' + element.first_name + '</p>';
        person += '<p>Last name ' + element.last_name + '</p>';
        person += '<p>email ' + element.email + '</p>';
        person += '<button type="button" onclick="editUser(' + element.id + ')">Edit</button>';
        person += '<button type="button" onclick="removeUser(' + element.id + ')">Remove</button>';
        person += '</div>';
    });

    document.getElementById("view-all-users").innerHTML = person;
}

function failure(error) {
    console.log(error);
}

/* functions to add new person
 *
 */ 

async function addNew() {
    let first_name = document.getElementById("first_name").value; 
    let last_name = document.getElementById("last_name").value;
    let email = document.getElementById("email").value;

    let data = {"first_name": first_name, "last_name": last_name, "email": email }

    console.log(data);

    // console.log(JSON.parse(JSON.stringify(data)));

    let response = await fetch(urlToSaveRecords, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
            // 'Content-Type': 'application/form-data'
        },
        body: JSON.stringify(data)
        // body: {"first_name": first_name, "last_name": last_name, "email": email }
    });

    let result = await response.json();

    alert(result);

    getRecords();
}


async function editUser(id) {
    let idTobeUpdated = id;
  
    alert("you are about to edit user with id of " + id);

    document.getElementById("update").innerHTML = '<form><h3>Update user</h3><p>Firstname: <input type="text" name="updated_first_name" id="updated_first_name"><p>Lastname: <input type="text" name="updated_last_name" id="updated_last_name"></p><p>Email: <input type="email" name="updated_email" id="updated_email"></p><p><button type="button" onclick="updateUser(' + idTobeUpdated + ')">Edit</button></p></form>';

}

async function updateUser(idTobeUpdated) {
    let updateId = idTobeUpdated;
    let updated_first_name = document.getElementById("updated_first_name").value;
    let updated_last_name = document.getElementById("updated_last_name").value;
    let updated_email = document.getElementById("updated_email").value;

    let data = {
        "updateId": updateId, 
        "updated_first_name": updated_first_name,
        "updated_last_name": updated_last_name,
        "updated_email": updated_email
    };

    console.log(data);

    let response = await fetch(urlToUpdateRecords, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
            // 'Content-Type': 'application/form-data'
        },
        body: JSON.stringify(data)
        // body: {"first_name": first_name, "last_name": last_name, "email": email }
    });

    let result = await response.json();

    alert(result);

    getRecords();

    document.getElementById("update").innerHTML = ' ';
}

async function removeUser(id) {
    let data = {"id": id};

    console.log(data);

    let response = await fetch(urlToDeleteRecords, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    });

    let result = await response.json();

    alert(result);

    getRecords();
}

getRecords();