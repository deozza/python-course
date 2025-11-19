import random

randomNumber = random.randrange(1,100)
message = ''

if randomNumber % 3 == 0:
    message += 'pouet'

if randomNumber % 5 == 0:
    message += 'plouf'

if message == '':
    message = randomNumber

print(message)

