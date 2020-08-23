## 学习总结

###动态规划 Dynamic Programming
1. “Simplifying a complicated problem by breaking it down into
simpler sub-problems”
(in a recursive manner)
2. Divide & Conquer + Optimal substructure
分治 + 最优子结构
3. 顺推形式： 动态递推
#### 关键点
动态规划 和 递归或者分治 没有根本上的区别（关键看有无最优的子结构）
拥有共性：找到重复子问题
差异性：最优子结构、中途可以淘汰次优解

### DP 顺推模板

```
function DP():
dp = [][] # ⼆维情况
for i = 0 .. M {
for j = 0 .. N {
dp[i][j] = _Function(dp[i’][j’]…)
}
}
return dp[M][N];
```
### 字符串算法
#### Atoi 代码示例
```
//C/C++
int myAtoi(string str) {
   int res = 0;
   int sign = 1;
   size_t index = 0;
   if(str.find_first_not_of(' ') != string::npos) 
       index = str.find_first_not_of(' ');
   if(str[index] == '+' || str[index] == '-')
       sign = str[index] == '-' ? -1 : 1;
    
    while(index < str.size() && isdigit(str[index])) {
        res = res * 10 + (str[index++] - '0');
        if(res*sign > INT_MAX) return INT_MAX;
        if(res*sign < INT_MIN) return INT_MIN; 
    }

   return res*sign;
}
```