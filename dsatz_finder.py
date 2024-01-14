import re

# Function to find $dsatz references
def find_dsatz_references_in_php_code(php_code):
    dsatz_references = set()
    
    # Find all references to $dsatz[...]
    dsatz_refs = re.findall(r"\$dsatz\['([\w]+)'\]", php_code)
    for ref in dsatz_refs:
        dsatz_references.add(ref)
                
    return dsatz_references

# Load the PHP code from the file into a string
with open("funktionen/auswertung_heber_einfügen.php", "r", encoding='utf-8', errors='ignore') as file:
    php_code_snippet = file.read()

# Running the function
dsatz_found = find_dsatz_references_in_php_code(php_code_snippet)
print(dsatz_found)
