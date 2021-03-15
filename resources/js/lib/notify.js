/**
 * Dispatch global event
 *
 * @param {String} type notification type
 */
const notif = (data) => {
    let eventName = "notif";
    var cancelAble = "";

    const event = document.createEvent("Events");
    event.initEvent(eventName, true, cancelAble == true);
    event.data = data || {};

    window.dispatchEvent(event);
};

window.Notify = {
    notif,
};
