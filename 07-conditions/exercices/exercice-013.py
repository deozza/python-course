import random

number = random.randrange(1,10)

message = str(number)+ ' est '

if number % 2 == 0:
    message + 'pair'
else:
    message + 'impair'

print(message)
