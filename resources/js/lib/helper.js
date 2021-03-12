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

window.Helper = {
    setAll,
    setNull,
};
