document.addEventListener('DOMContentLoaded', function() {
    var commentForm = document.getElementById('commentForm');

    commentForm.addEventListener('submit', function(e) {
        e.preventDefault();

        var commentText = document.getElementById('commentText').value;
        var formData = new FormData();
        formData.append('commentText', commentText);

        fetch('/add-comment', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data.success);
                if(data.success) {
                    addCommentToPage(data.comment); 
                } else {
                    alert('Failed to add comment: ' + data.message);
                }
                commentForm.reset();
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});

function addCommentToPage(comment) {
    var commentsList = document.getElementById('commentsList');
    var newCommentDiv = document.createElement('div');
    newCommentDiv.className = 'card mb-3';
    newCommentDiv.id = 'comment-' + comment.id;

    var deleteButtonHTML = '';
    var editButtonHTML = '';

    deleteButtonHTML = `<button onclick="deleteComment(${comment.id})" class="btn btn-danger btn-sm">Delete</button>`;
    editButtonHTML = `<button onClick="showEditInterface(${comment.id})" class="btn btn-secondary btn-sm">Edit</button>`;

    newCommentDiv.innerHTML = `
    <div class="card-body">
        <h5 class="card-title">${comment.username}</h5>
        <p class="card-text">${comment.text}</p>
        ${deleteButtonHTML}
        ${editButtonHTML}
    `;
    commentsList.appendChild(newCommentDiv);
    newCommentDiv.scrollIntoView({behavior: 'smooth'});
}


function deleteComment(commentId) {
    if (confirm('Are you sure you want to delete this comment?')) {
        fetch('/delete-comment', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ commentId: commentId })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('comment-' + commentId).remove();
                } else {
                    alert('Failed to delete comment. Javascript file.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
}

function updateComment(commentId) {
    var newText = document.getElementById('editText-' + commentId).value;

    fetch('/update-comment', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ commentId: commentId, newText: newText })
    })
        .then(response => response.json())
        .then(data => {
            console.log('Update response:', data);
            if (data.success) {
                var commentDiv = document.getElementById('comment-' + commentId);
                var cardBody = commentDiv.querySelector('.card-body');

                cardBody.innerHTML = `
                <h5 class="card-title">${data.comment.username}</h5>
                <p class="card-text">${newText}</p>
                <button onclick="deleteComment(${commentId})" class="btn btn-danger btn-sm">Delete</button>
                <button onclick="showEditInterface(${commentId})" class="btn btn-secondary btn-sm">Edit</button>
            `;
            } else {
                alert('Failed to update comment: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}


function showEditInterface(commentId) {
    var commentDiv = document.getElementById('comment-' + commentId);
    var currentText = commentDiv.querySelector('.card-text').innerText;

    // Replace text with an input field
    var inputField = `<textarea id="editText-${commentId}">${currentText}</textarea>`;
    var saveButton = `<button onclick="updateComment(${commentId})">Save</button>`;

    commentDiv.querySelector('.card-body').innerHTML = inputField + saveButton;
}



