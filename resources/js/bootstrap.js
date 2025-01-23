import axios from "axios";
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
// import Echo from "laravel-echo";
// import Pusher from "pusher-js";

// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: "pusher",
//     key: "ab71602936902850a7cc",
//     cluster: "ap1",
//     forceTLS: true,
// });
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

// import "./echo";

window.Echo.private(`private-chat-conversation.${chat_conversation_id}`).listen(
    "ChatMessageSent",
    (event) => {
        console.log("New message received:", event.chat_message);
        Livewire.emitTo(
            "chat-messages-page",
            "chat-message-sent",
            event.chat_conversation,
            event.chat_message
        );
    }
);
