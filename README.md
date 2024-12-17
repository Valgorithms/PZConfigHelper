# PZConfigHelper

PZConfigHelper is a PHP tool designed to generate mod lists for Project Zomboid from a specified directory structure. It scans directories to create lists of mod IDs and workshop items, and saves these lists to text files.

## Installation

Clone the repository to your local machine:

```sh
git clone https://github.com/yourusername/PZConfigHelper.git
```

Navigate to the project directory:

```sh
cd PZConfigHelper
```

## Usage

Run the script with the `--path` option to specify the directory containing the mods:

```sh
php src/PZConfigHelper/PZConfigHelper.php --path='D:\\SteamLibrary\\steamapps\\workshop\\content\\108600'
```

This will generate three files in the current working directory:
- `Mods.txt`: Contains a list of mod names.
- `WorkshopItems.txt`: Contains a list of workshop item IDs.
- `Both.txt`: Contains a combined list of mod names and workshop item IDs.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Author

Valithor Obsidion <valithor@valzargaming.com>
