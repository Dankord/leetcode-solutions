var TimeLimitedCache = function() {
    this.cache = new Map();
};

/**
 * @param {number} key
 * @param {number} value
 * @param {number} duration time until expiration in ms
 * @return {boolean} if un-expired key already existed
 */
TimeLimitedCache.prototype.set = function(key, value, duration) {
    // cfirst checker if thee key even exist
    if(this.cache.has(key)) {
        const Ekey = this.cache.get(key);

        if(Ekey.expiresAt > Date.now()) {
            // overwrite it if it is exisitng
            this.cache.set(key, {
                value: value,
                expiresAt: Date.now() + duration
            })
            return true;
        }
        //delete the cache if its expired
        this.cache.delete(key);
    }
    // set a new one if none is existing
    this.cache.set(key, {
        value: value,
        expiresAt: Date.now() + duration
    });
    return false;
};

/**
 * @param {number} key
 * @return {number} value associated with key
 */
TimeLimitedCache.prototype.get = function(key) {
    const item = this.cache.get(key);
    if (!item) {
        return -1;
    }
    if (item.expiresAt <= Date.now()) {
        this.cache.delete(key);
        return -1
    }
        return item.value;
};

/**
 * @return {number} count of non-expired keys
 */
TimeLimitedCache.prototype.count = function() {
    let count = 0;
    for(const [key, item] of this.cache) {
        if(item.expiresAt > Date.now()) {
            count++;
        } else {
            this.cache.delete(key);
        }
    }

    return count;
};

/**
 * const timeLimitedCache = new TimeLimitedCache()
 * timeLimitedCache.set(1, 42, 1000); // false
 * timeLimitedCache.get(1) // 42
 * timeLimitedCache.count() // 1
 */