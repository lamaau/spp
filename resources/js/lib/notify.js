/**
 * Dispatch global event
 *
 * @param {String} type notification type
 */
const notice = (data) => {
    var cancelAble = "";
    let eventName = "notice";
    let timeNow = Date.now();

    const event = document.createEvent("Events");
    event.initEvent(eventName, true, cancelAble == true);
    event.data = { id: timeNow, ...data } || { id: timeNow };

    window.dispatchEvent(event);
};

window.Notify = {
    notice,
};
