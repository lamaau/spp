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

window.Helper = {
    setAll,
    setNull,
    persist
};
