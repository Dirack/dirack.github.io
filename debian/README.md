# Debian packages repository

This is the [GPGEOF's](https://github.com/gpgeof) packages repository. You can download all the packages available here under the terms of the
[GPL3.0 license](https://www.gnu.org/licenses/quick-guide-gplv3.pt-br.html). They
are open source software, so feel free to share and modify them.

- Maintainer: Rodolfo A C Neves (Dirack) - rodolfo_profissional@hotmail.com

# Packages List

Package   | version | type |  |  |  |
--------- | ------- | ---- | - | - | - |
shellinclude | 0.1.0 | Beta version | [[deb]](https://github.com/Dirack/Shellinclude/releases/download/v0.1-beta.1/shellinclude_0.1.0_all.deb) | [[zip]](https://github.com/Dirack/Shellinclude/archive/refs/tags/v0.1-beta.1.zip) | [[tar.gz]](https://github.com/Dirack/Shellinclude/archive/refs/tags/v0.1-beta.1.tar.gz) |
pythoninclude | 0.1.0 | Beta version | [[deb]](https://github.com/Dirack/Pythoninclude/releases/download/v0.1.0-beta.1/pythoninclude_0.1.0_all.deb) | [[zip]](https://github.com/Dirack/Pythoninclude/archive/refs/tags/v0.1.0-beta.1.zip) | [[tar.gz]](https://github.com/Dirack/Pythoninclude/archive/refs/tags/v0.1.0-beta.1.tar.gz) |
shellunity | 0.1.0 | Beta version | [[deb]](https://github.com/Dirack/shellUnity/releases/download/v0.1.0/shellunity_0.1.0_all.deb) | [[zip]](https://github.com/Dirack/shellUnity/archive/refs/tags/v0.1.0.zip) | [[tar.gz]](https://github.com/Dirack/shellUnity/archive/refs/tags/v0.1.0.tar.gz) |
raytracer | 0.1.0 | Beta version |  | [[zip]](https://github.com/gpgeof/rayTracer/archive/refs/tags/v0.1-beta.1.zip) | [[tar.gz]](https://github.com/gpgeof/rayTracer/archive/refs/tags/v0.1-beta.1.tar.gz) |

# How to add this repository to your sources.list?

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



