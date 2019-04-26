# Installation

    git clone git@github.com:godvsdeity/shift-bash.git
    cd shift-bash/ && composer install


# Usage

    php shift.php [file.dat] [file.out]

### Terminal mode

Using this mode you can run how many commands you want directly from terminal

    php shift.php

### File mode

Runs the commands from a file

    # outputs to terminal
    php shift.php file.dat
    # outputs to file.out
    php shift.php file.dat file.out

# TODO list

- improve code decoupling to respect SOLID principles
- add unit tests
