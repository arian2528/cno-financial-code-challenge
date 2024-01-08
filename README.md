Assessment

Problem: The goal is to make all of the assertions at the bottom pass. The code that we want to implement should generate the STD benefit amount, monthly cost, and per pay-cycle cost for an individual.

To calculate these amounts, we use following data points:

Benefit rate (any decimal value) - Used to calculate the benefit amount
Cost Rate (any decimal value) - Used to calculate the cost of the benefit
Pay-cycle count (any integer between 1 and 52) - How many times an employee gets paid in the span of a year
Maximum benefit amount (any decimal value) - Benefit amount cannot exceed this value
The person’s weekly salary, which is annual salary divided by the amount of weeks in a year, which we can assume is 52 weeks.
Benefit amount - Weekly salary multiplied by benefit rate. Cannot exceed maximum benefit amount.
Monthly cost - Benefit amount divided by 10, and then multiplied by configured cost rate
Per pay-cycle cost - Monthly cost multiplied by 12, and then divided by pay-cycle count

![image001](https://github.com/arian2528/cno-financial-code-challenge/assets/13653364/0be01720-6985-49b5-bbe4-f6030d4962fd)
