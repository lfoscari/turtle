with import <nixpkgs> {};

let svg_turtle = python3.pkgs.buildPythonPackage rec {
  pname = "svg_turtle";
  version = "0.4.0";
  buildInputs = with pkgs.python39Packages; [ svgwrite ];
  src = python3.pkgs.fetchPypi {
    inherit pname version;
    sha256 = "sha256-t30apK8aTrjGUXWJL9Rg2SEmNygCD5gCYph/rTCYabY=";
  };
}; in

# let svgpathtools = python3.pkgs.buildPythonPackage rec {
#   pname = "svgpathtools";
#   version = "1.4.4";
#   buildInputs = with pkgs.python39Packages; [ svgwrite numpy scipy ];
#   src = python3.pkgs.fetchPypi {
#     inherit pname version;
#     sha256 = "sha256-nhxgwjkqhhPxDATjFZIuylcTYxGqRD29T1t/MKlTVUs=";
#   };
# }; in

let pythonPackages = with pkgs.python39Packages; [
  tkinter
  svg_turtle
  # svgpathtools
  # svgwrite
  tqdm
  numpy
  php
  # scour
]; in

pkgs.mkShell {
	buildInputs = with pkgs; [ python39 pythonPackages ];
}
