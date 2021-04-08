/**
 * Set all object value
 *
 * @param {Object} obj
 * @param {String|Number|Boolean|NULL} val
 */
const setAll = (obj, val) => {
    Object.keys(obj).forEach((index) => {
        obj[index] = val;
    });
};

/**
 * Set null a object
 *
 * @param {Object} obj
 */
const setNull = (obj) => {
    setAll(obj, null);
};

/**
 * Save something in local storage
 *
 * @param {String} key
 * @param {String} url
 * @returns obj
 */
const persist = async (key, url) => {
    let result = JSON.parse(window.localStorage.getItem(key));

    if (!result) {
        const response = await axios.get(`/api/v1/${url}`);
        const { data } = await response;

        window.localStorage.setItem(key, JSON.stringify(data));
        return data;
    }

    return result;
};

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

window.Helper = {
    setAll,
    setNull,
    persist,
    notice,
};
