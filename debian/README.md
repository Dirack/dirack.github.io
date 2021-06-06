# Debian packages repository

To add this repository to your apt repositories add the following line to your '/etc/apt/sources.list' file:

```sh
deb [trusted=yes] https://dirack.github.io/debian ./
```

Update packages list with:

```sh
sudo apt update
```

Now you can download all of the packages available in this repository using apt as follows:

```sh
sudo apt install <package>
```

And if you need a specific release use:

```sh
sudo apt install <package>=<release>
```
