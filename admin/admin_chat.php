<?php include './c_header.php'; ?>

<?php 
// Fetch chat messages from the database
$shedule = "SELECT * FROM a_chat ORDER BY date ASC";
$result = mysqli_query($conn, $shedule);


$shedule1 = "SELECT * FROM t_chat ORDER BY date ASC";
$result1 = mysqli_query($conn, $shedule1);
?>

<style>
/* Chat Container */
.main-container {
    padding: 20px;
    background-color: #f4f5f7;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Chat Box */
.chat-box {
    width: 100%;
    max-width: 1000px;
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    padding-left: 200px;
}

/* Chat Header */
.chat-header {
    background-color: #007bff;
    color: white;
    padding: 15px;
    font-weight: bold;
    text-align: center;
}

/* Chat Body */
.chat-body {
    padding: 15px;
    height: 300px;
    overflow-y: auto;
    background-color: #f0f0f0;
}

/* Messages */
.message {
    display: flex;
    margin-bottom: 10px;
    align-items: flex-end;
}

.message.user {
    justify-content: flex-end;
}

.message.bot {
    justify-content: flex-start;
}

.message-content {
    padding: 10px 15px;
    border-radius: 20px;
    max-width: 60%;
}

.message.user .message-content {
    background-color: #007bff;
    color: white;
}

.message.bot .message-content {
    background-color: #f0f0f0;
    color: #333;
}

/* Chat Input */
.chat-footer {
    display: flex;
    padding: 10px;
    border-top: 1px solid #ddd;
    background-color: #f4f5f7;
}

.chat-footer input {
    flex-grow: 1;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 20px;
    outline: none;
}

.chat-footer button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 20px;
    margin-left: 10px;
    cursor: pointer;
}

.chat-footer button:hover {
    background-color: #0056b3;
}
</style>

<div class="main-container">
    <div class="chat-box">
        <div class="chat-header">Chat</div>
        <div class="chat-body" id="chat-body">
            <!-- Messages will be dynamically appended here -->
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <div class="message <?php echo $row['name'] == '<?php echo $username;  ?>' ? '<?php echo $username;  ?>' : 'bot'; ?>">
                        <div class="message-content">
                            <strong><?php echo $row['name']; ?>:</strong> <?php echo $row['description']; ?>
                            <br><small><?php echo date('Y-m-d H:i', strtotime($row['date'])); ?></small>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No messages yet.</p>
            <?php endif; ?>


            <?php if (mysqli_num_rows($result1) > 0): ?>
                <?php while($row1 = mysqli_fetch_assoc($result1)): ?>
                    <div class="row">
                    <div class="message col-sm-6 <?php echo $row1['name'] == '<?php echo $username;  ?>' ? '<?php echo $username;  ?>' : 'bot'; ?>">
                        <div class="message-content">
                            <strong><?php echo $row1['name']; ?>:</strong> <?php echo $row1['description']; ?>
                            <br><small><?php echo date('Y-m-d H:i', strtotime($row1['date'])); ?></small>
                        </div>
                    </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No messages yet.</p>
            <?php endif; ?>

        </div>

        <div class="chat-footer">
            <input type="text" id="messageInput" placeholder="Enter your message..." autocomplete="off">
            <input type="hidden" name="user_id" value="<?php echo $admin_id; ?>">
            <input type="hidden" name="name" value="<?php echo $username; ?>">
            <button type="button" class="btn btn-primary" id="sendButton">Send</button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sendButton = document.querySelector('#sendButton');
    const messageInput = document.querySelector('#messageInput');
    const chatBody = document.querySelector('#chat-body');

    // Function to append messages to the chat body
    function appendMessage(message, userType) {
        const messageElement = document.createElement('div');
        messageElement.classList.add('message', userType);

        const messageContent = document.createElement('div');
        messageContent.classList.add('message-content');
        messageContent.innerHTML = message;

        messageElement.appendChild(messageContent);
        chatBody.appendChild(messageElement);
        chatBody.scrollTop = chatBody.scrollHeight; // Scroll to bottom
    }

    // Send message and save to database using AJAX
    sendButton.addEventListener('click', function() {
        const message = messageInput.value.trim();
        if (message) {
            // Append the user's message to the chat body (right side)
            appendMessage(`<strong><?php echo $username;  ?>:</strong> ${message}`, '<?php echo $username;  ?>');
            
            // AJAX to send data to the server
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'insert_chat.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const botReply = xhr.responseText;  // Bot/server response
                    appendMessage(`<strong>Bot:</strong> ${botReply}`, 'bot');  // Display bot reply (left side)
                }
            };
            const data = `name=<?php echo $username; ?>&a_id=1&description=${message}&title=ChatTitle`; // Example data
            xhr.send(data);

            // Clear input after sending
            messageInput.value = '';
        }
    });

    // Optional: Send message on Enter key press
    messageInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();  // Prevent form submission
            sendButton.click();  // Trigger send button click
        }
    });
});
</script>

<?php include './c_footer.php'; ?>
