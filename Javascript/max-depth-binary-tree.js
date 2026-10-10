/**
 * Definition for a binary tree node.
 * function TreeNode(val, left, right) {
 *     this.val = (val===undefined ? 0 : val)
 *     this.left = (left===undefined ? null : left)
 *     this.right = (right===undefined ? null : right)
 * }
 */
/**
 * @param {TreeNode} root
 * @return {number}
 */
var maxDepth = function(root) {
    if(root) {
        let depthLeft = maxDepth(root.left);
        let depthRight = maxDepth(root.right);
        return Math.max(depthLeft, depthRight) + 1;
    }

    return 0;
};