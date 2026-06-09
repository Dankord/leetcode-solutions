/**
 * @param {number[]} nums
 * @return {number[]}
 */
var leftRightDifference = function(nums) {
    let result = [];
    let leftSum = 0;
    let rightSum = 0;
    let totalSum = 0;

    for (const num of nums) {
        totalSum += num;
    }

    for (const num of nums) {
        let rightSum = totalSum - leftSum - num;
        result.push(Math.abs(rightSum - leftSum));

        leftSum += num;
    }
    return result;
};