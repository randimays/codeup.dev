<?php
// Input / Output
function prompt($message) {
    alert($message);
    return trim(fgets(STDIN));
}

function confirm($message) {
    return strtolower(prompt($message)) === 'y';
}

function alert($message) {
    fwrite(STDOUT, $message . PHP_EOL);
}

// Middleware
function loadContacts() {
    $content = trim(file_get_contents('contacts.txt'));
    $lines = explode("\n", $content);
    $contacts = [];
    foreach ($lines as $line) {
        $contact = explode('|', $line);
        addContact($contacts, $contact[0], $contact[1]);
    }
    return $contacts;
}

function saveContacts($contacts) {
    $content = '';
    foreach ($contacts as $contact) {
        $content .= implode('|', $contact) . "\n";
    }
    file_put_contents('contacts.txt', $content);
}

// Model
function addContact(&$contacts, $name, $number) {
    $contacts[] = [
        'name' => $name,
        'number' => $number,
    ];
}

function searchContact($contacts, $name) {
    $matches = [];
    foreach ($contacts as $contact) {
        if (strpos($contact['name'], $name) !== false) {
            $matches[] = $contact;
        }
    }
    return $matches;
}

function deleteContacts(&$contacts, $name) {
    foreach ($contacts as $index => $contact) {
        if (strpos($contact['name'], $name) !== false) {
            unset($contacts[$index]);
        }
    }
}

// Validation
function isValidName($name) {
    return !empty(trim($name));
}

function isValidPhoneNumber($phoneNumber) {
    return !empty(trim($phoneNumber)) && is_numeric($phoneNumber)
        && (strlen($phoneNumber) == 7 || strlen($phoneNumber) == 10);
}

function inputName($message) {
    $name = prompt($message);
    if (isValidName($name)) {
        return $name;
    }
    alert('Please enter a non-empty name');
    return inputName($message);
}

function inputNumber($message) {
    $number = prompt($message);
    if (isValidPhoneNumber($number)) {
        return $number;
    }
    alert('Please enter a phone number with 7 or 10 digits');
    return inputNumber($message);
}

// View
function longestNameLength($contacts) {
    $longest = -1;
    foreach ($contacts as $contact) {
        $nameLength = strlen($contact['name']);
        if ($nameLength > $longest) {
            $longest = $nameLength;
        }
    }
    return $longest;
}

function longestPhoneNumber($contacts) {
    $longest = -1;
    $max = 12; // Max length for phone numbers is 12, after format
    foreach ($contacts as $contact) {
        $numberLength = strlen($contact['number']);
        $formatLength = $numberLength == 7 ? 1 : 2;
        if ($numberLength + $formatLength > $longest) {
            $longest = $numberLength + $formatLength;
        }
        if ($longest === $max) {
            break;
        }
    }
    return $longest;
}

function formatNumber($number) {
    if (strlen($number) == 7) {
        return substr($number, 0, 3) . '-' . substr($number, 3);
    }
    if (strlen($number) == 10) {
        return substr($number, 0, 3) . '-' . substr($number, 3, 3) . '-' . substr($number, 6);
    }
    return $number;
}

function formatContacts($contacts) {
    $nameLength = longestNameLength($contacts);
    $phoneLength = longestPhoneNumber($contacts);
    array_unshift($contacts, ['name' => 'Name', 'number' => 'Phone']);
    $table = '';
    foreach ($contacts as $contact) {
        $table .= '| '
            . str_pad($contact['name'], $nameLength) . ' | '
            . str_pad(formatNumber($contact['number']), $phoneLength) . " |\n";
    }
    return $table;
}

// Controllers
function viewContacts($contacts) {
    $contactsTable = formatContacts($contacts);
    alert($contactsTable);
}

function newContact(&$contacts) {
    $name = inputName('Enter a new contact name:');
    $number = inputNumber('Enter phone number');
    $matches = searchContact($contacts, $name);
    if (count($matches) > 0) {
        $message = "There's already a contact named $name. Do you want to overwrite it? (y/n)";
        if (confirm($message)) {
            deleteContacts($contacts, $name);
        } else {
            newContact($contacts);
        }
    }
    addContact($contacts, $name, $number);
    alert('Contact saved successfully!');
}

function findContact($contacts) {
    $name = inputName('Enter the name to search:');
    $matches = searchContact($contacts, $name);
    alert(formatContacts($matches));
}

function deleteContact(&$contacts) {
    $name = prompt('Enter the name of the contact to delete:');
    deleteContacts($contacts, $name);
    alert('Contacts deleted successfully!');
}

// Front controller
function contactsManager() {
    $menu = <<<MENU
1. View contacts.
2. Add a new contact.
3. Search a contact by name.
4. Delete an existing contact.
5. Exit.
Enter an option (1, 2, 3, 4 or 5):
MENU;
    do {
        $contacts = loadContacts();
        $option = prompt($menu);
        switch ($option) {
            case 1:
                viewContacts($contacts);
                break;
            case 2:
                newContact($contacts);
                break;
            case 3:
                findContact($contacts);
                break;
            case 4:
                deleteContact($contacts);
                break;
            default:
                alert('See you!');
        }
        saveContacts($contacts);
    } while ($option != 5);
}

contactsManager();