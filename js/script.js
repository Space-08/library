//Для создания нового абонемента
const new_subscription_button = document.querySelector('.new-subscription-button');
const new_subscription = document.getElementById('new-subscription');
const new_subscription_overlay = document.getElementById('new-subscription-overlay');
const new_subscription_container = document.getElementById('new-subscription-container');

new_subscription_button.addEventListener('click', () =>{
	new_subscription_container.style.display = 'flex';
});

new_subscription_overlay.addEventListener('click', () =>{
	new_subscription_container.style.display = 'none';
});

//Для редактирования абонемента
const edit_subscription_button = document.querySelector('.edit-subscription-object');
const edit_subscription = document.getElementById('edit-subscription');
const edit_subscription_overlay = document.getElementById('edit-subscription-overlay');
const edit_subscription_container = document.getElementById('edit-subscription-container');

edit_subscription_button.addEventListener('click', () =>{
	edit_subscription_container.style.display = 'flex';
});

edit_subscription_overlay.addEventListener('click', () =>{
	edit_subscription_container.style.display = 'none';
});

//Для создания нового читателя
const new_reader_button = document.querySelector('.new-reader-button');
const new_reader = document.getElementById('new-reader');
const new_reader_overlay = document.getElementById('new-reader-overlay');
const new_reader_container = document.getElementById('new-reader-container');

new_reader_button.addEventListener('click', () =>{
	new_reader_container.style.display = 'flex';
});

new_reader_overlay.addEventListener('click', () =>{
	new_reader_container.style.display = 'none';
});

//Для редактирования читателя
function editReader(readerId) {
  const editContainer = document.getElementById('edit-reader-container');
  editContainer.style.display = 'flex';
  const edit_reader_overlay = document.getElementById('edit-reader-overlay');
  edit_reader_overlay.addEventListener('click', () =>{
  	editContainer.style.display = 'none';
  });

  // Выполняем AJAX-запрос для получения данных читателя
  const xhr = new XMLHttpRequest();
  xhr.open('GET', `get_reader_data.php?reader_id=${readerId}`, true);
  xhr.onload = function() {
    if (this.status === 200) {
      const readerData = JSON.parse(this.responseText);

      // Заполняем поля формы данными из ответа
            document.getElementById('reader_id').value = readerData.reader_id;
            document.getElementById('first_name').value = readerData.first_name;
            document.getElementById('second_name').value = readerData.second_name;
            document.getElementById('last_name').value = readerData.last_name;
            document.getElementById('birthday').value = readerData.birthday;
            document.getElementById('address').value = readerData.address;
            document.getElementById('telephone').value = readerData.telephone;
          }
        };
        xhr.send();
}

//Для удаления читателя
const deleteButtons = document.querySelectorAll('.delete-reader-object');

deleteButtons.forEach(button => {
    button.addEventListener('click', () => {
        const readerId = button.parentElement.id.split('-')[1];

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_reader.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (this.status === 200) {
                location.reload();
            }
        };
        xhr.send(`reader_id=${readerId}`);
    });
});